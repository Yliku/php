console.time();
for(let i=0;i<10;i++){}
console.timeEnd();


const people = {
    "person1": {"fname": "san", "lname": "zhang"}, 
    "person2": {"fname": "si", "lname": "li"}, 
    "person3": {"fname": "wu", "lname": "wang"}
};
console.table(people);


const arr = [1, 2, 3];
console.assert(arr.length === 4);

console.group("1");
console.log("1-1");
console.log("1-2");
console.log("1-3");
console.groupEnd();
console.group("2");
console.log("2-1");
console.log("2-2");
console.log("2-3");
console.groupEnd();