var hash = location.hash;

function Page() {
    var self = this;
    this.init = function () {
        self.header();
        return self;
    };
    this.header = function () {

    };
    this.initCkeditor = function () {
        CKEDITOR.replace('.ckeditor', {
            uiColor: '#9AB8F3',
            language: 'vi',
            filebrowserImageBrowseUrl: baseURL + '/assets/plugins/ckfinder/ckfinder.html?Type=Images',
            filebrowserFlashBrowseUrl: baseURL + '/assets/plugins/ckfinder/ckfinder.html?Type=Flash',
            filebrowserImageUploadUrl: baseURL + '/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl: baseURL + '/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            toolbar: [
                ['Source', '-', 'Save', 'NewPage', 'Preview', '-', 'Templates'],
                ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Print'],
                ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
                ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'HiddenField'],
                ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'],
                ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv'],
                ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                ['Link', 'Unlink', 'Anchor'],
                ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'],
                ['Styles', 'Format', 'Font', 'FontSize'],
                ['TextColor', 'BGColor'],
                ['Maximize', 'ShowBlocks', '-', 'About']
            ]
        });
    }
    this.initDataTable = function (id) {
        $('.datatable').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    }
}

Page = new Page();
$(window).on('load', function () {
    $(document).ready(function () {
        Page.init();
    });
});
$("div.alert").delay(5000).slideUp();


function popupTPT(text, style) {
    toastr.options = {
        "positionClass": "toast-bottom-right",
        "progressBar": true,
    };
    if (style == 0) {
        toastr.error(text);
    } else {
        toastr.info(text);
    }
}

function isNumericKey(e) {
    var k = document.all ? e.keyCode : e.which;
    return ((k > 47 && k < 58) || k == 8 || k == 0);
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function isValidPhoneNumber(phone_number) {
    var pattern = new RegExp(/^(0|\+84)\d{9,10}$/);
    return pattern.test(phone_number);
}

function isEmpty(str) {
    return typeof str == 'string' && !str.trim() || typeof str == 'undefined' || str === null;
}

function confirmDelete() {
    var msg = "Are you sure ?";
    if (window.confirm(msg)) {
        return true;
    }
    return false;
}

function resizeInput() {
    $(this).attr('size', $(this).val().length + 2);
}

function to_slug(str) {
    // Chuyển hết sang chữ thường
    str = str.toLowerCase();

    // xóa dấu
    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
    str = str.replace(/(đ)/g, 'd');

    // Xóa ký tự đặc biệt
    str = str.replace(/([^0-9a-z-\s])/g, '');

    // Xóa khoảng trắng thay bằng ký tự -
    str = str.replace(/(\s+)/g, '-');

    // xóa phần dự - ở đầu
    str = str.replace(/^-+/g, '');

    // xóa phần dư - ở cuối
    str = str.replace(/-+$/g, '');

    // return
    return str;
}

function getLocaleText(text, locale) {
    var regex = new RegExp('\\[:' + locale + '\\]([^\\[]+)\\[:', 'i'),
        result = '';
    text.replace(regex, function (match, $1) {
        result = $1;
    });
    return result;
}

$(document).ready(function () {
    $('input[type="text"]').keyup(resizeInput).each(resizeInput);
    $('.num').keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: Ctrl+C
            (e.keyCode == 86 && e.ctrlKey === true) ||
            // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    if ($('#slug').length) {
        var $slug = $('#slug'),
            slugOriVal = $('#slug').val();

        $('input[name="title[' + current_locale + ']"').focusout(function (event) {
            if (slugOriVal === '' || $slug.val() === '') {
                $slug.val(to_slug($(this).val()));
            }
        });
    }
    $(document).on('click', '.lang-switch > li > a', function (e) {
        var $target = $(e.target);
        $('.lang-switch > li > a[data-tab-lang=' + $target.data('tab-lang') + ']').tab('show');
    });
});

function selectImage(id) {
    //e.preventDefault();
    var finder = new CKFinder();
    finder.selectActionFunction = function (url) {
        $('#input_' + id).val(url);
        $("#img_" + id).attr("src", url)
    };
    finder.popup();
}

function _checkEmail(email) {
    var _token = $('meta[name="csrf-token"]').attr('content');
    var formData = new FormData();
    formData.append("_token", _token);
    formData.append("email", email);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': _token
        }
    });
    $.ajax({
        url: baseURL + "/admin/member/checkEmail",
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function (data) {
            if (data.success == true) {
                if (!isEmail(email)) {
                    $("#btn_form").attr('disabled', 'disabled');
                    $("#email").css('border-color', 'red');
                } else {
                    $("#btn_form").removeAttr('disabled');
                    $("#email").css('border-color', 'green');
                }
            } else {
                $("#btn_form").attr('disabled', 'disabled');
                $("#email").css('border-color', 'red');
            }
        },
        error: function (xhr, textStatus, errorThrown) {
        }
    });
}

function deleteItemGallary(item) {
    $("#img_image_" + item).attr("src", "");
    $("#input_image_" + item).val("");
    $("#item_gallery_" + item).fadeOut();
}

function addMoreGallery() {
    console.log('addMoreGallery');
    var _length = $('.item_gallery').length;
    var _add = "selectImage('image_" + _length + "')";
    var _delete = "deleteItemGallary('" + _length + "')";
    var _html = "<div class='col-md-6 item_gallery m-t-10' id='item_gallery_" + _length + "'>";
    _html += "<div class='form-group'>";
    _html += "<img src='/assets/admin/1200x630.png' class='img-responsive' onclick=" + _add + " id='img_image_" + _length + "'>";
    _html += "<input type='hidden' name='gallery[]' value='/assets/admin/1200x630.png' id='input_image_" + _length + "'/>";
    _html += "<button onclick=" + _delete + " type='button' class='btn btn-danger btn-xs btn-delete-gallery'><i class='fa fa-fw fa-trash'></i></button>";
    _html += "</div>";
    _html += "</div>";
    $("#list_gallery").append(_html);
}

if ($("#datepicker").length) {
    $('#datepicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: moment().add(-10, 'year'),
        maxYear: moment().add(10, 'year'),
        startDate: $("#_datepicker").val(),
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        //alert("You are " + years + " years old!");
    });
}

if ($("#invoice_date").length) {
    $('#invoice_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: moment().add(-10, 'year'),
        maxYear: moment().add(10, 'year'),
        startDate: $("#_invoice_date").val(),
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        //alert("You are " + years + " years old!");
    });
}

if ($("#debt_term_date_bk").length) {
    $('#debt_term_date_bk').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: moment().add(-10, 'year'),
        maxYear: moment().add(10, 'year'),
        startDate: $("#_debt_term").val(),
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        //alert("You are " + years + " years old!");
    });
}

if ($("#debt_due_date").length) {
    $('#debt_due_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: moment().add(-10, 'year'),
        maxYear: moment().add(10, 'year'),
        startDate: $("#_debt_due_date").val(),
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        //alert("You are " + years + " years old!");
    });
}

if ($(".select2").length) {
    $('.select2').select2();
}

if ($("#debt_due_date").length) {
    $('#debt_due_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: moment().add(-10, 'year'),
        maxYear: moment().add(10, 'year'),
        startDate: $("#_debt_due_date").val(),
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        //alert("You are " + years + " years old!");
    });
}

if ($("#etd").length) {
    $('#etd').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        singleDatePicker: true,
        showDropdowns: true,
        minYear: moment().add(-10, 'year'),
        maxYear: moment().add(10, 'year'),
        startDate: $("#_etd").val(),
        locale: {
            format: 'DD/MM/YYYY hh:mm'
        }
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        //alert("You are " + years + " years old!");
    });
}

if ($("#eta").length) {
    $('#eta').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        singleDatePicker: true,
        showDropdowns: true,
        minYear: moment().add(-10, 'year'),
        maxYear: moment().add(10, 'year'),
        startDate: $("#_eta").val(),
        locale: {
            format: 'DD/MM/YYYY hh:mm'
        }
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        //alert("You are " + years + " years old!");
    });
}

function formatVND(n) {
    n = parseFloat(n);
    var currency = n.toFixed(0).replace(/./g, function (c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
    });

    return currency;
};

function change_method(element){
    $('#_type_method').addClass('hidden');
    $('#_type_lc').addClass('hidden');
    switch($(element).val()){
        case 'TT':
            $('#_type_method').removeClass('hidden');
            break;
        case 'LC':
            $('#_type_lc').removeClass('hidden');
            break;
    }
}

function change_invoice_date(el){
    var date = $(el).val();
    var days = $("#debt_term_date").val();
    var new_date = moment(date, "DD/MM/YYYY").add(days, 'days').format('DD/MM/YYYY');
    $("#debt_due_date").val(new_date);
    $("#_debt_due_date").val(new_date);
}

function change_currency_unit(el){
    $("#type_currency_unit").html('('+$(el).val()+')');
}

function change_debt_term_date(element){
    var days = $(element).val();
    var date = $("#invoice_date").val();
    var new_date = moment(date, "DD/MM/YYYY").add(days, 'days').format('DD/MM/YYYY');
    $("#debt_due_date").val(new_date);
    $("#_debt_due_date").val(new_date);
}

if ($(".date-range-services").length) {
    $('.date-range-services').daterangepicker({
        showDropdowns: true,
        startDate: $("#_date_start").val(),
        endDate: $("#_date_end").val(),
        ranges: {
            'Hôm nay': [moment(), moment()],
            'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 ngày qua': [moment().subtract(6, 'days'), moment()],
            '30 ngày trước': [moment().subtract(29, 'days'), moment()],
            'Tháng này': [moment().startOf('month'), moment().endOf('month')],
            'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        alwaysShowCalendars: true,
        locale: {
            format: 'DD/MM/YYYY'
        },
    }, function (start, end, label) {
        //var years = moment().diff(start, 'years');
    });
};

function showLoading(div) {
    $("#" + div).addClass('hidden').removeClass('hidden');
}

function offLoading(div) {
    $("#" + div).removeClass('hidden').addClass('hidden');
}