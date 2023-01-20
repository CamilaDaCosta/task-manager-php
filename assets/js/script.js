document.querySelector('#task_image').addEventListener('change', function(){
    document.querySelector('.image-name').textContent = this.files[0].name;
})