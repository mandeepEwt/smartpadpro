(function() {
    tinymce.PluginManager.add( 'youtube_video', function( editor, url ) {
        editor.addButton('youtube_video', {
            title: 'Insert Youtube Video',
            text: '',
            image: url + '/youtube.png',
            onclick: function() {
                editor.windowManager.open({
                    title: 'Add Youtube Video',
                    body: [{
                        type: 'textbox',
                        name: 'youtube_url',
                        label: 'Youtube Video URL',
                        value: ''
                    //}, {
                    //    type: 'textbox',
                    //    name: 'youtube_width',
                    //    label: 'Width',
                    //    value: '100%'
                    //}, {
                    //    type: 'textbox',
                    //    name: 'youtube_height',
                    //    label: 'Height',
                    //    value: '1000px'
                    }],
                    onsubmit: function(e) {
                        editor.insertContent(
                            '[youtube_video url="' +
                            e.data.youtube_url +
                            //'" width="' +
                            //e.data.youtube_width +
                            //'" height="' +
                            //e.data.youtube_height +
                            '"]');
                    }
                });
            }
        });
    });
})();