$(document).ready(function () {
    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.registerPlugin(FilePondPluginImageCrop);
    FilePond.registerPlugin(FilePondPluginImageResize);
    FilePond.registerPlugin(FilePondPluginImageTransform);
    FilePond.registerPlugin(FilePondPluginImageExifOrientation);

    // Create a FilePond instance
    const ponds = [];
    $('.image-upload').each(function (index, element) {
        console.log(element.getAttribute('data-aspectRatio'));

        var pond = FilePond.create(element, {
            allowImageCrop: true,

            imageCropAspectRatio: element.getAttribute('data-aspectRatio'),
            imageResizeTargetWidth: element.getAttribute('data-width'),

            imageResizeMode: 'contain',
            imageResizeUpscale: true,

            allowImageTransform: true,
            imageTransformOutputMimeType: 'image/jpeg',
            imageTransformOutputQuality: 100,
            allowImageResize: true,

            allowImagePreview: true,
            allowImageExifOrientation: true,

            allowMultiple: false,
            server: {
                url: '/backend/file-upload',
                process: {
                    url: '/process',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    onload: (response) => {
                        disableLoading();
                        return response;
                    },
                    onerror: (response) => {
                        disableLoading();
                        return response;
                    },
                    ondata: (formData) => {
                        enableLoading();
                        return formData;
                    },
                },
                fetch: null,
                revert: null,
            },
        });
        ponds.push(pond);
    });
});

function enableLoading(){
    $('.submitBtn').loading('enable');
}

function disableLoading(){
    $('.submitBtn').loading('disable');
}