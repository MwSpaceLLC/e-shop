const backend = $('meta[name="backend-path"]').attr('content');

const eshop = axios.create({
    baseURL: backend,
    timeout: 1000,
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
});

tippy('[data-tippy-content]');

$("form").each(function () {
    let form = $(this);
    let submit = form.find(':submit');
    $(this).on('submit', evt => {
        submit.prepend('<i class="fas fa-spinner fa-pulse"></i> ');
        submit.attr('disabled', true);
    });
});

$('.percent').mask('##0,00%', {reverse: true});
$('.price').mask("#.##0,00", {reverse: true});

tinymce.init({
    selector: ".tiny",
    plugins: "paste",
    paste_data_images: true,
    theme: "silver",
    height: "380",
});

$('input[type="file"]').change(function (e) {
    $(this).closest('.file-upload-wrapper').attr('data-text', e.target.files[0].name)
});

$(".select-mime").on('change', () => {
    console.log($(".select-mime").val())
    if ($(".select-mime").val() === 'cover') {
        $('.input-mime').attr('accept', 'image/*')
    } else $('.input-mime').attr('accept', $(".select-mime").val() + '/*')
});

var sortableModels = document.getElementById('sortableModels');
var model = sortableModels.dataset.model;
if (sortableModels)
    Sortable.create(sortableModels, {
        animation: 250,  // ms, animation speed moving items when sorting, `0` — without animation
        easing: "cubic-bezier(1, 0, 0, 1)", // Easing for animation. Defaults to null. See https://easings.net/ for examples.
        ghostClass: "bg-warning",  // Class name for the drop placeholder
        chosenClass: "bg-secondary",  // Class name for the chosen item
        dragClass: "sortable-drag",  // Class name for the dragging item
        handle: ".draggable",  // Drag handle selector within list items
        store: {
            /**
             * Save the order of elements. Called onEnd (when the item is dropped).
             * @param {Sortable}  sortable
             */
            set: function (sortable) {
                var order = sortable.toArray();

                eshop.post('model/position/' + model, {
                    indexes: order,
                })
                    .then(function (response) {
                        // handle success
                        console.log(response);
                        Snackbar.show({
                            text: sortableModels.dataset.success,
                            pos: 'bottom-center',
                            actionTextColor: '#0F9D58',
                        });
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                        Snackbar.show({
                            text: sortableModels.dataset.error,
                            pos: 'bottom-center',
                            actionTextColor: '#DB4437',
                        });
                    });

            }
        }
    });
