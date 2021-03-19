Echo.private("PostUpdate-channel")
    .listen("PostUpdated", (e) => {
        document.getElementById('statusMessage').innerHTML = e.post.title;
        $("#registerFormWindowMessage").modal('show');
    })