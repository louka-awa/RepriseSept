(function($) {
  'use strict';
  $(function() {
    if ($('#editable-form').length) {
      $.fn.editable.defaults.mode = 'inline';
      $.fn.editableform.buttons =
        '<button type="submit" class="btn btn-primary btn-sm editable-submit">' +
        '<i class="fa fa-fw fa-check"></i>' +
        '</button>' +
        '<button type="button" class="btn btn-default btn-sm editable-cancel">' +
        '<i class="fa fa-fw fa-times"></i>' +
        '</button>';
      
      $('#username').editable({
        type: 'text',
        pk: 1,
        name: 'username',
        title: 'Entrez le nom d\'utilisateur'
      });

      $('#firstname').editable({
        validate: function(value) {
          if ($.trim(value) === '') return 'Ce champ est requis';
        }
      });

      $('#sex').editable({
        source: [{
            value: 1,
            text: 'Homme'
          },
          {
            value: 2,
            text: 'Femme'
          }
        ]
      });

      $('#status').editable();

      $('#group').editable({
        showbuttons: false
      });

      $('#vacation').editable({
        datepicker: {
          todayBtn: 'lié'
        }
      });

      $('#dob').editable();

      $('#event').editable({
        placement: 'right',
        combodate: {
          firstItem: 'name'
        }
      });

      $('#meeting_start').editable({
        format: 'aaaa-mm-jj hh:ii',
        viewformat: 'jj/mm/aaaa hh:ii',
        validate: function(v) {
          if (v && v.getDate() === 10) return 'Le jour ne peut pas être 10 !';
        },
        datetimepicker: {
          todayBtn: 'lié',
          weekStart: 1
        }
      });

      $('#comments').editable({
        showbuttons: 'bottom'
      });

      $('#note').editable();
      $('#pencil').on("click", function(e) {
        e.stopPropagation();
        e.preventDefault();
        $('#note').editable('toggle');
      });

      $('#state').editable({
        source: ["Alabama", "Alaska", "Arizona", "Arkansas", "Californie", "Colorado", "Connecticut", "Delaware", "Floride", "Géorgie", "Hawaï", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiane", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "Nouveau-Mexique", "New York", "Dakota du Nord", "Caroline du Nord", "Ohio", "Oklahoma", "Oregon", "Pennsylvanie", "Rhode Island", "Caroline du Sud", "Dakota du Sud", "Tennessee", "Texas", "Utah", "Vermont", "Virginie", "Washington", "Virginie-Occidentale", "Wisconsin", "Wyoming"]
      });

      $('#state2').editable({
        value: 'Californie',
        typeahead: {
          name: 'state',
          local: ["Alabama", "Alaska", "Arizona", "Arkansas", "Californie", "Colorado", "Connecticut", "Delaware", "Floride", "Géorgie", "Hawaï", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiane", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "Nouveau-Mexique", "New York", "Dakota du Nord", "Caroline du Nord", "Ohio", "Oklahoma", "Oregon", "Pennsylvanie", "Rhode Island", "Caroline du Sud", "Dakota du Sud", "Tennessee", "Texas", "Utah", "Vermont", "Virginie", "Washington", "Virginie-Occidentale", "Wisconsin", "Wyoming"]
        }
      });

      $('#fruits').editable({
        pk: 1,
        limit: 3,
        source: [{
            value: 1,
            text: 'banane'
          },
          {
            value: 2,
            text: 'pêche'
          },
          {
            value: 3,
            text: 'pomme'
          },
          {
            value: 4,
            text: 'pastèque'
          },
          {
            value: 5,
            text: 'orange'
          }
        ]
      });

      $('#tags').editable({
        inputclass: 'input-large',
        select2: {
          tags: ['html', 'javascript', 'css', 'ajax'],
          tokenSeparators: [",", " "]
        }
      });

      $('#address').editable({
        url: '/post',
        value: {
          city: "Moscou",
          street: "Lenina",
          building: "12"
        },
        validate: function(value) {
          if (value.city === '') return 'La ville est requise !';
        },
        display: function(value) {
          if (!value) {
            $(this).empty();
            return;
          }
          var html = '<b>' + $('<div>').text(value.city).html() + '</b>, ' + $('<div>').text(value.street).html() + ' rue, bld. ' + $('<div>').text(value.building).html();
          $(this).html(html);
        }
      });

      $('#user .editable').on('hidden', function(e, reason) {
        if (reason === 'save' || reason === 'nochange') {
          var $next = $(this).closest('tr').next().find('.editable');
          if ($('#autoopen').is(':checked')) {
            setTimeout(function() {
              $next.editable('show');
            }, 300);
          } else {
            $next.focus();
          }
        }
      });
    }
  });
})(jQuery);
