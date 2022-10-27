function addVariableProduct(e)
{
    e.preventDefault()
    let btn = e.target
    
    if(! btn.classList.contains('addVP')) 
        return undefined

    let fila = btn.closest('tr')
    let number = fila.querySelector('input')
    let select = fila.querySelector('select')
    let selectedOption = select.options[select.selectedIndex];

    let obj = {
        id:             `${btn.dataset.id}${selectedOption.value.trim()}`,
        image:          btn.dataset.image,
        code:           btn.dataset.code,
        name:           btn.dataset.name,
        diameter:       btn.dataset.diameter,
        material:       selectedOption.value,
        amount:         $(fila).find('input[name="number"]').val(),
    }

    
    axios.post(btn.dataset.url, obj)
    .then(response => {
        btn.textContent = 'Agregado'
        setTimeout(() => {
            btn.textContent = 'cotizar'
        }, 1000);
    })
    .catch(error =>{
        console.error(error)
        btn.textContent = 'Error'
        setTimeout(() => {
            btn.textContent = 'cotizar'
        }, 1000);
    })
    
}

let table = document.getElementById('tableVP')

if (table) 
    table.addEventListener('click', addVariableProduct)

$('.toggle').click(function(e){
    e.preventDefault()
    $(this).siblings('ul').toggle();
})