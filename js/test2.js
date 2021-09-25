$(document).ready(function(){
    var html=`<tr><td><input class="form-control" type="text" name="steps[]" required=""></td>
               <td><input class="btn btn-danger" type="button" name="remove2" id="remove-button2-%s" value="remove"></td></tr>`
    var removeButtonId = 0

    const addButton2 = document.getElementById("add-button2")
    addButton2.addEventListener("click", () => {
        document.getElementById("table_field2").insertAdjacentHTML( 'beforeend', html.replace("%s", removeButtonId) );

        const removeButton2 = document.getElementById(`remove-button2-${removeButtonId}`)

        removeButton2.addEventListener("click", () => {
            var row = removeButton2.parentNode.parentNode;
            row.parentNode.removeChild(row);
            // removeButton.parentNode.removeChild(removeButton);
        })
        removeButtonId += 1
    })

    const removeButtons = document.querySelectorAll("input[name=\"remove2\"]")
    removeButtons.forEach(elm => {
        elm.addEventListener("click", () => {
            var row = elm.parentNode.parentNode;
            row.parentNode.removeChild(row);
        })
    })

});