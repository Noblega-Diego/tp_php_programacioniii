
const id = id => document.getElementById(id);

const searhRowData = (element, stopElement) => {
    if(element.dataset["id"] != undefined){
        return element;
    }else{
        if(element === stopElement)
            return null;
        else
            return searhRowData(element.parentElement);
    }
}
const table = id("table");
table.addEventListener("click", (e)=>{
    if(e.target.tagName === "BUTTON"){
        const row = searhRowData(e.target,table);
        if(row != null){
            console.log(row);
            fetch(`${location.href.split("?")[0]}?id=${row.dataset["id"]}`,{
                method: 'DELETE',
            }).then(data => location.href = location.href.split("?")[0])
        }
    }
})