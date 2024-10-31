(function () {
  tinymce.PluginManager.add('gaoptout', function (editor, url) {
    editor.addButton('gaoptout', {
      title: 'Google Analytics Opt-Out',
      icon: 'gaoptout',
      onclick: function () {
        editor.insertContent(' [ga_optout] ');
      }
    });
  });
})();