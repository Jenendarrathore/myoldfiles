const posts = [
    {
        title : 'post 1',
        body : 'this is post 1'
    },
    {
        title : 'post 2',
        body : 'this is post 2'
  
    }
];

function getPost(){
    setTimeout( () => {
let output = "";

posts.forEach( (post) => {
    output += `<li>${post.title}</li>`;
});
document.body.innerHTML  = output;


    },1000);
}

function creatPost(post,callback){
setTimeout( () => {

    posts.push(post);
    callback();

},2000 );
}

getPost();

creatPost({title:'post3',body:'thsi is post3'} , getPost);