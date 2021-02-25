function setCookie(key, value, expires) {
    // 判断是否有过期时间
    if (expires) {
        let date = new Date();
        let d = date.getTime() - 8 * 60 * 60 * 1000;
        d = d + expires * 1000;

        date.setTime(d);
        document.cookie = `${key}=${value};expires=${date};path=/`
        return
    }
    document.cookie = `${key}=${value};path=/`
}

function getCookie(key){
    let cookie = document.cookie;
    // cookie = 'age=18; a=1; b=2'
    // {age:18,a:1,b:2}
    let arr = cookie.split('; ');
    let obj = {};
    arr.forEach(item=>{
        obj[item.split('=')[0]] = item.split('=')[1]
    })
    // 如果不存在key这个值 那么以对象的形式返回所有的cookie的值
    if(!key){
        return obj
    }

    for(let i in obj){
        //判断传进来的 key 和 i的值  
        if(key == i){
            return obj[i]
        }  
    }
}