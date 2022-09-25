console.log(process.pid);
console.log(process.versions.node);
console.log(process.argv);

const [, , firstName, lastName] = process.argv;

console.log(`your name is ${firstName} ${lastName}`)