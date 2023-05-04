Echo.private("PostUpdate-channel")
    .listen("PostUpdated", (e) => {
        document.getElementById('statusMessage').innerHTML = "Изменена статья: <a href='/posts/" + e.slug + "'>" + e.title + "</a><br>" +
        'Были изменены поля: ' + e.fields;
        $("#registerFormWindowMessage").modal('show');
    });