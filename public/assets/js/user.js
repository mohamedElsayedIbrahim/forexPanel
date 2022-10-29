var site = "http://127.0.0.1:8000/api"; //http://clinic-system.atwebpages.com/

document.getElementById("serviceButton").onclick = function(){
    var xhr = new XMLHttpRequest();
        var url = site+"/permission";
        xhr.open("get", url, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var json = JSON.parse(xhr.responseText);
                let content ="";
                content += `
                    <tr>
                    <td>
                        <select class="form-select" name="permissions[]" required aria-label="Default select example">
                        <option selected disabled value="">Open this permission menu</option>
                        `;
                for (let object in json) {
                    content += `<option value="`+json[object].id+`">`+json[object].nameScreen+`</option>`;
                }
                content+=`
                </select>
                </td>
                <td>
                <select class="form-select" name="roles[]" aria-label="Default select example" required>
                  <option selected disabled value="">Open this role menu</option>
                  <option value="all" class="text-capitalize">all</option>
                  <option value="write" class="text-capitalize">write</option>
                  <option value="read" class="text-capitalize">read</option>
                  <option value="edit" class="text-capitalize">edit</option>
                  <option value="delete" class="text-capitalize">delete</option>
                </select>   
              </td>
              <td>
                  <button class="btn btn-danger" type="button" onclick="deleteRow(this);">Remove</button>
              </td>
            </tr>
  `;
  document.getElementById("tbody").insertAdjacentHTML('afterend',content);
            }
        };
    
    xhr.send();
};

function deleteRow(e){
    var row = e.parentNode.parentNode;
    row.remove();
}