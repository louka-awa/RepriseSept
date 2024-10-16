<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Méta tags requis -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Loukaawa, marché de ventes en ligne</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('Administrateur/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ url('Administrateur/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ url('Administrateur/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css pour cette page -->
  <link rel="stylesheet" href="{{ url('Administrateur/vendors/mdi/css/materialdesignicons.min.css') }}">
  <!-- Plugin css pour cette page -->
  <link rel="stylesheet" href="{{ url('Administrateur/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ url('Administrateur/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('Administrateur/js/select.dataTables.min.css') }}">
  <!-- Fin du css du plugin pour cette page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ url('Administrateur/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ url('Administrateur/images/favicon.png') }}" />
  <!-- datatable -->
  <link rel="stylesheet" href="{{ url('Administrateur/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ url('Administrateur/css/dataTables.bootstrap4.min.css') }}">
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('Administrateur.layout.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('Administrateur.layout.sidebar')
      <!-- partial -->
      @yield('content')
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ url('Administrateur/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js pour cette page -->
  <script src="{{ url('Administrateur/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ url('Administrateur/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ url('Administrateur/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ url('Administrateur/js/dataTables.select.min.js') }}"></script>

  <!-- Fin du js du plugin pour cette page -->
  <!-- inject:js -->
  <script src="{{ url('Administrateur/js/off-canvas.js') }}"></script>
  <script src="{{ url('Administrateur/js/hoverable-collapse.js') }}"></script>
  <script src="{{ url('Administrateur/js/template.js') }}"></script>
  <script src="{{ url('Administrateur/js/settings.js') }}"></script>
  <script src="{{ url('Administrateur/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Js personnalisé pour cette page -->
  <script src="{{ url('Administrateur/js/dashboard.js') }}"></script>
  <script src="{{ url('Administrateur/js/Chart.roundedBarCharts.js') }}"></script>
  <!-- Fin du js personnalisé pour cette page -->
  <!-- Js personnalisé pour l'Administrateuristration -->
  <script src="{{ url('Administrateur/js/custom.js') }}"></script>
  <!-- Fin du js personnalisé pour l'Administrateuristration -->
  <!-- Confirmer la suppression -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
     tinymce.init({
       selector: 'textarea#myeditorinstance', // Remplacez ce sélecteur CSS pour correspondre à l'élément d'espace réservé pour TinyMCE
       plugins: 'powerpaste advcode table lists checklist',
       toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
     });
  </script>

  <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/super-build/ckeditor.js"></script>
        <!--
            Décommentez pour charger la traduction espagnole
            <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/super-build/translations/es.js"></script>
        -->
        <script>
            // Cet exemple ne montre toujours pas toutes les fonctionnalités de CKEditor 5 (!)
            // Visitez https://ckeditor.com/docs/ckeditor5/latest/features/index.html pour parcourir toutes les fonctionnalités.
            CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changer la langue de l'interface nécessite de charger le fichier de langue à l'aide de la balise <script>.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraphe', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Titre 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Titre 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Titre 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Titre 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Titre 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Titre 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Bienvenue dans CKEditor 5 !',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                // Faites attention avec le réglage ci-dessous. Cela indique à CKEditor d'accepter TOUT le balisage HTML.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Faites attention avec l'activation des aperçus
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Téléchargeable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@pomme', '@ours', '@brownie', '@gâteau', '@bonbon', '@canne', '@chocolat', '@biscuit', '@coton', '@crème',
                                '@cupcake', '@danish', '@beignet', '@dragée', '@gâteau aux fruits', '@pain d'épices', '@gomme', '@glace', '@gelée',
                                '@liquorice', '@macaron', '@massepain', '@avoine', '@tarte', '@prune', '@pudding', '@sésame', '@snaps', '@soufflé',
                                '@sucre', '@doux', '@garniture', '@gaufre'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // Le "super-build" contient plus de fonctionnalités premium qui nécessitent une configuration supplémentaire, désactivez-les ci-dessous.
                // Ne les activez pas à moins de lire la documentation et de savoir comment configurer et installer l'éditeur.
                removePlugins: [
                    // Ces deux plugins sont commerciaux, mais vous pouvez les essayer sans vous inscrire pour un essai.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // Cet exemple utilise l'adaptateur d'upload Base64 pour gérer les uploads d'images car il nécessite aucune configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Stocker les images sous forme de Base64 est généralement une très mauvaise idée.
                    // Remplacez-le sur le site Web de production par d'autres solutions :
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Attention, avec le plugin Mathtype CKEditor ne se chargera pas en chargeant cet exemple
                    // à partir d'un système de fichiers local (file://) - chargez ce site via le serveur HTTP si vous activez MathType.
                    'MathType',
                    // Les fonctionnalités suivantes font partie du pack de productivité et nécessitent une licence supplémentaire.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents'
                ]
            });
        </script>
</body>

</html>
