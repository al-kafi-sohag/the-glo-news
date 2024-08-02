$(document).ready(function () {
    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.registerPlugin(FilePondPluginFileValidateType);

    // Create a FilePond instance
    const ponds = [];
    $('.image-upload').each(function (index, element) {
        var pond = FilePond.create(element, {
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
            }
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
