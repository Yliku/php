<template>
	<div>
		<div class="img_box">
			<!--服务器中的图片-->
			<div :key="item+index"
				 class="img_item"
				 v-for="(item,index) in oldImg">
				<i @click="delServerImg(item,index)" class="fa fa-times del" v-if="delOrigin"></i>
				<!--<img :alt="item" :src="item">-->
				<IMG :src="item" className="serverImg"/>
			</div>
			<!--新添加的图片-->
			<div :key="item.data+index"
				 class="img_item"
				 v-for="(item,index) in imgList">
				<i @click="delThis(index)" class="fa fa-times del"></i>
				<img :alt="item.size+item.name" :class="`${imgName}canvasImg`" :size="item.size" :src="item.data"
					 :type="item.type">
			</div>
			<br>
			<i @click="clickInput"
			   class="add el-icon-plus avatar-uploader-icon"
			   v-show="multiple||imgList.length===0&&!multiple&&oldImg.length===0"></i>
		</div>
		<input :multiple="multiple"
			   @change="newFile"
			   accept="image/png,image/gif,image/jpeg" ref="fileElement"
			   type="file">
		<!--<div @click="pushImg">提交</div>-->
	</div>
</template>

<script>

	export default {
		name: "FileUpload",
		props: {
			multiple: {default: false},//是否上傳多張圖片
			imgName: {require: true},//返回已經上傳的圖片鏈接，必填,
			images: '',//修改服務器图片的时候使用
			delOrigin: {default: true},//是否删除提供删除按钮
		},
		data() {
			return {
				imgList: [],
				oldImg: [],
				delImg: [],
				canvasImg: [],
			}
		},

		methods: {
			/**
			 * 当有图片要显示的时候,先初始化
			 */
			initOldImg() {
				//console.log(this.imgName,'圖片组件圖片', this.images,);
				if (typeof this.images === "string") {
					this.oldImg[0] = this.images;
				} else if (this.images.length === 0) {
					this.oldImg = [];
				} else {
					this.oldImg = [...this.images];
				}
			},
			/**
			 * 触发input
			 */
			clickInput() {
				this.$refs.fileElement.click()
			},
			/**
			 * 删除选中图片
			 * @param index 图片索引
			 */
			delThis(index) {
				let temp = this.imgList;
				temp.splice(index, 1);
				this.imgList = [...temp];
			},
			/**
			 * 添加新图片文件
			 * @param e
			 */
			newFile(e) {
				const that = this;
				let file = Array.from(e.target.files);
				file.map(item => {
					let {name, size, type} = item;
					name = this.guid() + '.' + type.split("/")[1];
					let temp = {name, size, type};
					let reader = new FileReader();
					reader.readAsDataURL(item);
					reader.onload = function () {
						temp['data'] = this.result;
						that.imgList.push(temp);
					}
				});

				//清空input的值,修复删除图片后,再次选中相同的图片无效的bug
				that.$refs.fileElement.value = []
			},
			/**
			 * 获取唯一的uid
			 * @returns {string}
			 */
			guid() {
				return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
					const r = Math.random() * 16 | 0, v = c === 'x' ? r : (r & 0x3 | 0x8);
					return v.toString(16);
				})
			},
			/**
			 *base64 转 blob 函数
			 * @param dataURI
			 * @returns {Blob}
			 */
			dataURItoBlob(dataURI) {
				let byteString = atob(dataURI.split(',')[1]); ////去掉url的头，并转换为byte,发送的文件
				let mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];//文件类型
				let ab = new ArrayBuffer(byteString.length);
				let ia = new Uint8Array(ab);
				for (let i = 0; i < byteString.length; i++) {
					ia[i] = byteString.charCodeAt(i);
				}
				return new Blob([ab], {type: mimeString});
			},
			/**
			 * 刪除服務器圖片
			 * @param item 图片名称
			 * @param index 本地索引
			 */
			delServerImg(item, index) {
				this.delImg.push(item);//被刪除的圖片路徑
				let temp1 = {};
				temp1[this.imgName] = item;
				console.log('刪除服務器圖片', temp1);
				let temp = this.oldImg;
				temp.splice(index, 1);
				this.oldImg = [...temp];
			},
			//压缩
			canvasAction(base64List) {
				let className = `${this.imgName}canvasImg`;
				let imgList = document.getElementsByClassName(className);
				let file = Array.from(imgList);

				// 核心JS就这个
				let that = this;
				let canvas = document.createElement('canvas');
				let context = canvas.getContext('2d');
				file.map((item, index) => {
					let size = item.attributes.size.value / 1024;
					if (size > 200) {
						let type = item.attributes.type.value; // 图片类型
						let targetWidth = 800; //目标宽度
						let rate = item.naturalWidth / targetWidth; //缩放比例
						let targetHeight = item.naturalHeight / rate; //目标高度
						canvas.width = targetWidth;
						canvas.height = targetHeight;
						context.drawImage(item, 0, 0, targetWidth, targetHeight);
						let b = canvas.toDataURL(type || 'image/png', 1); //转化成base64
						this.canvasImg.push(b);
						context.clearRect(0, 0, targetWidth, targetHeight);
					} else {
						console.log(base64List, index, 'index错误数据');
						that.canvasImg.push(base64List[index].data)
					}
				});
				console.log(that.canvasImg, '经过处理的数据');
			},
			/**
			 * 向服务器上傳文件
			 */
			pushImg() {
				let imgList = this.imgList;
				if (imgList.length === 0 && this.delImg.length === 0) {
					return false
				}
				let n = {};
				this.canvasAction(imgList);
				n[this.imgName] = this.canvasImg.map(item => {
					return this.dataURItoBlob(item)
				});
				this.canvasImg = [];
				n['delimg'] = this.delImg;
				return n
			}
		},
		created() {
			this.initOldImg()
		}
	}
</script>

<style lang="scss" scoped>

	.img_box {
		//padding-bottom: 10px;
		min-height: 225px;
		min-width: 325px;
		border: 2px dashed #d9d9d9;
		border-radius: 5px;
		text-align: center;
		box-sizing: border-box;

		// border: 1px solid #ccc;
		.img_item {
			box-sizing: border-box;
			margin: 10px;
			display: inline-block;
			text-align: center;
			width: 320px;
			height: 200px;
			position: relative;

			.del {
				position: absolute;
				right: 20px;
				top: 20px;
				color: #EEE;
				font-size: 25px;
			}

		}

		.add {
			//position: relative;
			border: 1px dashed #d9d9d9 !important;
			border-radius: 5px !important;
			margin: auto;
			margin-bottom: 10px;
			width: 178px !important;
			height: 178px !important;
			line-height: 178px !important;
		}

		img, .serverImg {
			text-align: center;
			border-radius: 5px;
			width: 320px;
			height: 200px;
		}
	}

	input {
		display: none;
	}
</style>
