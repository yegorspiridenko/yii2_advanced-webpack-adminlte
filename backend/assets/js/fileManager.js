function initImageSelector(attributeName, rootClass = null, singleSelect = true) {
    $('body').on('click', `.add-image${rootClass ? `.${rootClass}` : ''}`, openImageSelector);
    $('body').on('click', `.delete-gallery-image${rootClass ? `.${rootClass}` : ''}`, deleteGalleryImage);

    function openImageSelector() {
        CKFinder.popup({
            chooseFiles: true,
            onInit(finder) {
                finder.on('files:choose', onFilesChoose);
            },
        });
    }

    function onFilesChoose(evt) {
        const selectedImages = evt.data.files.map((file) => file.getUrl());

        setImageField(selectedImages);
    }

    function deleteGalleryImage(event) {
        $(event.target).closest('.image-list__item').remove();
    }

    function setImageField(allFiles) {
        allFiles.forEach((fileUrl) => {
            $.get('/file-manager/preview-src', {
                url: fileUrl,
                category: 'all',
            }, handleImageData, 'json')
                .fail(() => {
                    alert('При загрузке данных произошла ошибка');
                });
        });
    }

    function handleImageData(data) {
        const previewSrc = data.preview;
        const src = data.image;
        const liElement = $(`
            <div class="image-list__item mr-4 ui-state-default">
                <a data-fancybox="gallery" data-src="${src}">
                    <img src="${previewSrc}">
                </a>
                <input type="hidden" name="${attributeName}" value="${src}">
                <div class="delete-gallery-image ${rootClass ? `${rootClass}` : ''} btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </div>
            </div>
        `);

        const imageList = $(`.image-list${rootClass ? `.${rootClass}` : ''}`);

        if (singleSelect) {
            imageList.html(liElement);
        } else {
            imageList.append(liElement);
        }
    }
}
