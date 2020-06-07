

$.get('http://localhost/web/library-tinf-project/api/library/read.php', (res) => {
    console.log(res);
    for (let i = 0; i < res.data.length; i++) {
        let innerHtml = `<tr><td>${res.data[i].id}</td><td>${res.data[i].location}</td><td>${res.data[i].name}</td></tr>`;
        $('tbody').append(innerHtml);
    }
});