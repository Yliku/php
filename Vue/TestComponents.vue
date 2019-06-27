<template>
	<div @dragenter="dragenter"
		 @dragleave="dragleave"
		 @dragover="dragover"
		 @drop="drop"
		 @mousemove="mousemove"
		 class="drop-field"
		 ref="hello">
		<div :key="index+'d'+item"
			 @drag="drag"
			 @dragend="dragend"
			 @dragexit="dragexit"
			 @dragstart="dragstart($event, item,index)"
			 class="item"
			 draggable="true" v-for="(item, index) in it">
			{{item}}
		</div>

		<div class="mouse">{{clientX}}++{{clientY}}</div>
	</div>

</template>

<script>
	/* eslint-disable 可拖拽功能的小组件*/
	export default {
		name: "TestComponents",
		data() {
			return {
				droppedItem: [],
				it: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
				clientX: 0,
				clientY: 0,
				domW: 0,
				domH: 0,
			}
		},

		mounted() {
		},
		methods: {
			/*
			* Step1: 拖拽对象的 dropstart；
			* Step2: 拖放区的 drop；
			* Step3：拖拽对象的 dropend；
			* */
			mousemove(event) {
				let dom = this.$refs.hello;

				/*console.log(dom.offsetLeft);
				console.log(dom.offsetTop);*/
				let scrollTop = document.documentElement.scrollTop + document.body.scrollTop;
				this.clientX = event.clientX - dom.offsetLeft;
				this.clientY = event.clientY - dom.offsetTop + scrollTop;
			},
			drop(event) {
				this.mousemove(event);
				//console.log('当元素或选中的文本在可释放目标上被释放时触发', event);
				event.preventDefault();//避免数据被处理
				let data = event.dataTransfer.getData('item');

				//let dom = event.target.getBoundingClientRect();
				let dom = this.$refs.hello.getBoundingClientRect();
				let bDomH = dom.height;
				let bDomW = dom.width;
				console.log(bDomW, bDomH, '父元素内容宽高');

				// 行数 向下取整
				let row = Math.floor(this.clientY / this.domH);
				//列数 向上取整
				let col = Math.ceil(this.clientX / this.domW);
				// 一行几个
				console.log(bDomW, this.domW);
				let n = Math.floor(bDomW / this.domW);
				// 位置索引
				let index = row * n + col - 1;
				console.log(row, col, n, '行,列,个', index, '位置');
				data = JSON.parse(data);
				//console.log(data, event);
				//索引 删除个数 ,添加值

				this.it.splice(data.index, 1);
				this.it.splice(index, 0, data.item);
			},
			drag(event) {
				if (this.domW === 0) {
					let dom = event.target.getBoundingClientRect();
					this.domH = dom.height + 40;
					this.domW = dom.width + 40;
					console.log('子元素宽度', this.domW, '子元素高度', this.domH);
				}
				//console.log('当拖动元素或选中的文本时触发。', event)
			},
			dragover(event) {
				//console.log('当元素或选中的文本被拖到一个可释放目标上时触发（每100毫秒触发一次）。', event);
				event.preventDefault()
			},
			dragenter(event) {
				//console.log('进入可释放元素', event);
			},
			dragexit(event) {
				console.log('当元素变得不再是拖动操作的选中目标时触发', event);
			},
			dragleave(event) {
				//console.log('当拖动元素或选中的文本离开一个可释放目标时触发。', event);
			},
			dragstart(event, item, index) {
				console.log('当用户开始拖动一个元素或选中的文本时触发', event);
				let n = JSON.stringify({index, item});
				console.log(n);
				event.dataTransfer.setData('item', n)

			},
			dragend(event) {
				//console.log('当拖拽操作结束时触发 (比如松开鼠标按键或敲“Esc”键)', event);
				event.dataTransfer.clearData()
			}
		}
	}
</script>
<style scoped>
	.mouse {
		position: absolute;
		background-color: #EEE;
		height: 60px;
		width: 60px;
	}

	.drop-field {
		box-sizing: border-box;
		padding: 1rem;
		background-color: #eee;
		margin-top: 1rem;
	}

	.item {
		display: inline-block;
		width: 300px;
		height: 3rem;
		text-align: center;
		line-height: 3rem;
		font-size: .9rem;
		margin: 20px;
		background-color: pink;
		color: #000;
	}

	.item:hover {
		cursor: pointer;
	}
</style>
