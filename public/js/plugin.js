tinymce.PluginManager.add('customButton', editor => {
    editor.ui.registry.addButton('customButton', {
        text: 'Media Contents',
        onAction: function() {
            const selectedMedia = editor.selection.getContent();

            if(!selectedMedia)
                showErrorDialog(editor);
            else {
                showMediaDialog(editor);
            }
        },
    });
});

function showErrorDialog(editor) {
    editor.notificationManager.open({
        text: "You haven't selected media content yet, please check again",
        type: 'error',
    })
}

function showMediaDialog(editor) {
    editor.windowManager.open({
        title: 'Select Media Content',
        body: {
            type: 'panel',
            items: [
                {
                    type: 'htmlpanel',
                    html: '<span>Select Your Media Content</span>',
                }, 

                {
                    type: 'selectbox',
                    name: 'mediaContent',
                    label: 'Media Content',
                    items: [ { text: '--Chọn--', value: '0', } ].concat(medias.map(media => {
                        return {
                            text: media.pivot.name,
                            value: media.id.toString(),
                        }
                    })),

                }
            ]
        }, 
        buttons: [
            {
                type: 'cancel',
                text: 'Close',
            },
            {
                type: 'submit',
                text: 'Save',
                primary: true,
            }
        ],

        onSubmit: function(e) {
            const selectedValue = e.getData().mediaContent;
            const selectedMedia = editor.selection.getContent();
            const formatElement = selectedMedia.replaceAll('<p>&nbsp;</p>', '');

            const node = editor.dom.create('div', {
                'media': selectedValue,
            });
            node.innerHTML = formatElement;
            const deleteItems = node.querySelectorAll('div[media]');
            deleteItems.forEach(item => {
                item.removeAttribute('media');
            });
            editor.selection.setContent(node.outerHTML, {format: 'raw'});
            editor.windowManager.close();
        }
    });
}

