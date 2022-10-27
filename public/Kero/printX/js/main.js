let tbody = document.querySelector("#tbody");
let arr = [];
for (let i = 0; i < 5; i++) {
  tbody.innerHTML += `
    <tr class=${i}>
        <td class=No${i}>${i + 1}</td>
        <td class=patientName${i}>Patient name ${i + 1}</td>
        <td class=PatientCounter${i}>Patient Counter ${i + 1}</td>
        <td class=Doctor${i}>Doctor ${i + 1}</td>
        <td class=Date${i}>Date ${i + 1}</td>
        <td><button onclick="x(this.id)" class="btn print" id=${i}>Print ${i + 1}</button></td>
    </tr>
    `;
  let tbody_No = document.querySelector(`.No${i}`).innerHTML;
  let tbody_patientName = document.querySelector(`.patientName${i}`).innerHTML;
  let tbody_PatientCounter = document.querySelector(`.PatientCounter${i}`).innerHTML;
  let tbody_Doctor = document.querySelector(`.Doctor${i}`).innerHTML;
  let tbody_Date = document.querySelector(`.Date${i}`).innerHTML;
  let obj = {
    tbodyOBJ_No: tbody_No,
    tbodyOBJ_patientName: tbody_patientName,
    tbodyOBJ_PatientCounter: tbody_PatientCounter,
    tbodyOBJ_Doctor: tbody_Doctor,
    tbodyOBJ_Date: tbody_Date,
    tbodyPrint: i + 1,
  };
  arr.push(obj);
  function x(e) {
    let result = document.querySelector("#result");
    result.innerHTML = `<div class="container">
    <div class="row">
    <h1 class"ClinicNemeBill"> Clinic Name</h1>
    <div class="AllText col-10">
        <h5>patient number: ${arr[e].tbodyOBJ_No}</h5>
        <h5>Patient name: ${arr[e].tbodyOBJ_patientName}</h5>
        <h5>Patient Counter: ${arr[e].tbodyOBJ_PatientCounter}</h5>
        <h5>Doctor: ${arr[e].tbodyOBJ_Doctor}</h5>
        <h5>Date: ${arr[e].tbodyOBJ_Date}</h5>
        <button onclick="printX()" class="btn print">Print Bill</button>
        </div>
        <div class="AllImg col-2">
            <img src="../img/logo.png">
        </div>
        </div>
        </div>`;
        function printX() {
            window.print();
        }
  }
}
console.log(arr)