tinymce.init({
  selector: "textarea",
  plugins:
    "advcode advlist advtemplate anchor autosave autolink casechange charmap checklist codesample directionality editimage emoticons export formatpainter help image insertdatetime link linkchecker lists media mediaembed nonbreaking pagebreak permanentpen powerpaste save searchreplace table tableofcontents tinymcespellchecker visualblocks visualchars wordcount",

  toolbar:
    "undo redo print spellcheckdialog formatpainter | fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify lineheight | checklist bullist numlist indent outdent | removeformat inserttemplate",
  height: "700px",
  spellchecker_language: 'en',
    spellchecker_active: false,
    advtemplate_templates: [
        {
            title: 'Category 1',
            items: [
                {
                    title: 'template 1.1',
                    content: '<h1>Introduction</h1><p>Content building starts with the first words</p>'
                }
            ],
        }
    ],
});
