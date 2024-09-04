function initCkeditor(idSnippet) {
    CKFinder.setupCKEditor();

    $(`[id^=${idSnippet}]`).each(function () {
        const editorId = $(this).attr('id');

        if (CKEDITOR.instances[editorId]) {
            CKEDITOR.instances[editorId].destroy();
        }

        CKEDITOR.replace(editorId);
    });
}
