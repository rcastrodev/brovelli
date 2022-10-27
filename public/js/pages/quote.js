let tableCotizacion = document.getElementById('table')

function removeItem(e)
{
    e.preventDefault()
    let btn = e.target
    if(! btn.classList.contains('removeItem')) 
        return undefined

    axios.delete(`${btn.dataset.url}`)
        .then(response => btn.closest('tr').remove())
        .catch(error => console.error(error))

 
}
tableCotizacion.addEventListener('click', removeItem)