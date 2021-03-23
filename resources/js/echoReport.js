Echo.private("ReportCreated-channel")
    .listen("ReportCreated", (e) => {
        var report = "Отчёт создан<br>";
        if (e.posts) {
            report = report + "Всего статей: " + e.posts + "<br>";
        }
        if (e.users) {
            report = report + "Всего пользователей: " + e.users + "<br>";
        }
        if (e.news) {
            report = report + "Всего новостей: " + e.news + "<br>";
        }
        if (e.tags) {
            report = report + "Всего тегов: " + e.tags + "<br>";
        }
        if (e.comments) {
            report = report + "Всего комментариев: " + e.comments + "<br>";
        }

        document.getElementById('statusMessage').innerHTML = report;
        $("#registerFormWindowMessage").modal('show');
    });