function initImageSelector(attributeName, rootClass = null, isMultipleSelect = false) {
    $('body').on('click', `.add-image${rootClass ? `.${rootClass}` : ''}`, openImageSelector);
    $('body').on('click', `.delete-gallery-image${rootClass ? `.${rootClass}` : ''}`, deleteGalleryImage);

    if (isMultipleSelect) {
        Sortable.create(document.getElementById(`sortable-${rootClass}`));
    }

    function openImageSelector() {
        CKFinder.popup({
            chooseFiles: true,
            onInit(finder) {
                finder.on('files:choose', onFilesChoose);
            },
        });
    }

    function onFilesChoose(evt) {
        const selectedImages = evt.data.files.map((file) => {
            return file.getUrl()
        });

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
            <div class="image-list__item">
                <a data-fancybox="gallery" data-src="${src}">
                    <img src="${previewSrc}">
                </a>
                <input type="hidden" name="${attributeName}" value="${src}">
                <div class="delete-gallery-image ${rootClass ? `${rootClass}` : ''} btn btn-xs btn-danger">
                    <i class="fas fa-trash"></i>
                </div>
            </div>
        `);

        const imageList = $(`.image-list${rootClass ? `.${rootClass}` : ''}`);

        if (isMultipleSelect) {
            imageList.append(liElement);
        } else {
            imageList.html(liElement);
        }
    }
}

function initFileSelector(attributeName, rootClass = null) {
    $('body').on('click', `.add-file${rootClass ? `.${rootClass}` : ''}`, openFileSelector);
    $('body').on('click', `.delete-file${rootClass ? `.${rootClass}` : ''}`, deleteFile);

    function openFileSelector() {
        CKFinder.popup({
            chooseFiles: true,
            onInit(finder) {
                finder.on('files:choose', onFilesChoose);
            },
        });
    }

    function onFilesChoose(evt) {
        const selectedImages = evt.data.files.map((file) => file.getUrl());

        setFileField(selectedImages);
    }

    function deleteFile() {
        $(this).siblings(`input[name="${attributeName}"]`).val(null);
    }

    function setFileField(allFiles) {
        allFiles.forEach((fileUrl) => handleFileData(fileUrl));
    }

    function handleFileData(src) {
        $(`.${rootClass} input[name="${attributeName}"]`).val(src);
    }
}
