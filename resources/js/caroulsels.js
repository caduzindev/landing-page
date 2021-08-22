function IdentifyTrActive(){
    const trs = document.querySelectorAll('tr[data-status]');

    trs.forEach(e=>{
        if(e.getAttribute('data-status')==='active'){
            e.classList.add('bg-secondary')
        }
    })
}
function IdentifyTrAndRemoveActive(e){
    const trs = document.querySelectorAll('tr[data-status]');
    trs.forEach(e=>{
        if(e.getAttribute('data-status')==='active'){
            e.classList.remove('bg-secondary')
        }
    })
    e.classList.add('bg-secondary')
}

function sendStatusOfCaroulseul(e){
    const id = e.target.getAttribute('data-id');
    let parentTr = e.target.parentNode.parentNode

    fetch(`/caroulsel/status/${id}`,{method:'GET'})
    .then(reponse=>{
        return reponse.status
    }).then(status=>{
        if(status===200){
            parentTr.setAttribute('data-status','active')
            IdentifyTrAndRemoveActive(parentTr)
        }
    }).catch(err=>{
        console.err(err)
    })
}
window.onload = ()=>{
    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    IdentifyTrActive()
    const buttonsTrs = document.querySelectorAll('.first-button');

    buttonsTrs.forEach(e=>{
        e.addEventListener('click',sendStatusOfCaroulseul)
    })

}