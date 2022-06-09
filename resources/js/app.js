import 'bootstrap/dist/js/bootstrap.bundle.min'

const content = document.querySelector("#content");
if (content)
    ClassicEditor.create(content).catch((error) => {
        console.error(error ?? "");
    });
