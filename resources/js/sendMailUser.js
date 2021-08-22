function BootstrapToast(type){
    const toastSuccess = document.getElementById('ToastSuccess')
    const toastError = document.getElementById('ToastError')

    switch(type){
        case 'SUCCESS':
            new bootstrap.Toast(toastSuccess).show()
            break
        case 'ERROR':
            new bootstrap.Toast(toastError).show()
            break
    }
}
function sendMailUser(e){
    e.preventDefault()
    const form = new FormData(e.target)

    fetch('/sendMailUser',{
        method:"POST",
        body:form,
        headers:{
            'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }).then(response=>{
        e.target.name.value = ''
        e.target.email.value = ''   
        switch(response.status){
            case 200:  
                BootstrapToast('SUCCESS')            
                break;
            case 500:
                BootstrapToast('ERROR') 
                break;
        }  
    }).catch(err=>{
        console.error(err)
    })
}
window.addEventListener('DOMContentLoaded',event=>{
    const form = document.querySelector('#contactForm')
    form.addEventListener('submit',sendMailUser)
})