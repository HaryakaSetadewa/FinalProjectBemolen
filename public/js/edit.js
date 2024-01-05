
    ClassicEditor
        .create(document.querySelector('#deskripsi'), {
            theme: 'dark'
        })
        .then(editor => {
            editor.ui.getEditableElement().parentElement.insertBefore(
                editor.ui.view.toolbar.element,
                editor.ui.getEditableElement()
            );
        })
        .catch(error => {
            console.error(error);
        });

        flatpickr('.flatpickr', {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
