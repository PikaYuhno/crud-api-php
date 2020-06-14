window.onload = async () => {
    const promise = await fetch('/api/library/read.php');
    const json = await promise.json();
    console.log("test");
    console.log(json);
    for(let i = 0; i< json.length; i++) {
        let row = `<tr>
        <td>${json[i].id}</td>
        <td>${json[i].location}</td>
        <td>${json[i].name}</td>
        <td>
            <button type="button" class="btn btn-success"></button>
            <button type="button" class="btn btn-danger" onclick="deleteFunc(${json[i].id})"></button>
        </td>
        </tr>`;
        $('#tbody').append(row);
    }
}


function deleteFunc(id){
    console.log(id);
}