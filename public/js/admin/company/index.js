let table = $('#page_table_slider').DataTable({
    serverSide: true,
    ajax: `${root}/slider/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "content_1" },
        { data: "image"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

let table2 = $('#page_table_weather').DataTable({
    serverSide: true,
    ajax: `${root}/get-weather`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "content_2" },
        { data: "content_1" },
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

function dataSliderContent(content)
{
    let form = document.getElementById('form-update-slider')
    form.reset()
    form.querySelector('input[name="id"]').setAttribute('value', content.id)
    form.querySelector('input[name="order"]').setAttribute('value', content.order)
    form.querySelector('input[name="content_1"]').setAttribute('value', content.content_1)
}

async function findContent2(id)
{   
    // get content 
    let url = document.querySelector('meta[name="content_find"]').getAttribute('content')
    if(url){
        if(id){
            try {
                let result = await axios.get(`${url}/${id}`)
                let content = result.data.content 
                dataContent2(content)
            } catch (error) {
                console.log(new Error(error));
            }
        }
    }
}

function dataContent2(content)
{
    let form = document.getElementById('form-update-weather')
    form.reset()
    form.querySelector('input[name="id"]').setAttribute('value', content.id)
    form.querySelector('input[name="content_2"]').setAttribute('value', content.content_2)
    CKEDITOR.instances['content_11'].setData(content.content_1)
}

function imgDelete(e)
{
    element = e.target
    if(element.classList.contains('form-control-file')) return undefined 

    e.preventDefault()
    if(element.classList.contains('image')){
        axios.delete(element.dataset.url)
            .then(r => {
                element.closest('div').remove()
            })
            .catch(e => console.error(new Error(e)))
    }
}

let sections = document.querySelectorAll('.image-delete')
if (sections) {
    sections.forEach(element => {
    element.addEventListener('click', imgDelete)
    })     
}

$('.eliminar-content-ajax').click(function (e) {
    e.preventDefault()
    let element = e.target
    axios.delete(element.dataset.url)
        .then(r => {
            location.reload()
        })
        .catch(e => console.error(new Error(e)))
})
