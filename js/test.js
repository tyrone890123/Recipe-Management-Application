$(document).ready(function(){
    var html=`<tr> <td><input class="form-control" type="text" name="q[]" required=""></td>
         <td><input class="form-control" type="text" name="i[]" required=""></td>
         <td><input class="btn btn-danger" type="button" name="Remove" id="remove-button-%s" value="remove" ></td></tr>`;
    var html2=``
    var removeButtonId = 0

    const addButton = document.getElementById("add-button")
    addButton.addEventListener("click", () => {
        document.getElementById("table_field").insertAdjacentHTML( 'beforeend', html.replace("%s", removeButtonId) );

        const removeButton = document.getElementById(`remove-button-${removeButtonId}`)

        removeButton.addEventListener("click", () => {
            var row = removeButton.parentNode.parentNode;
            row.parentNode.removeChild(row);
            // removeButton.parentNode.removeChild(removeButton);
        })
        removeButtonId += 1
    })

    const removeButtons = document.querySelectorAll("input[name=\"Remove\"]")
    removeButtons.forEach(elm => {
        elm.addEventListener("click", () => {
            var row = elm.parentNode.parentNode;
            row.parentNode.removeChild(row);
        })
    })
});