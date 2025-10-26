<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Salary Increment Letter Generator</title>
<style>
body { font-family: Arial, sans-serif; padding: 20px; background: #f5f6fa; }
.container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
form { background: #fff; padding: 20px; border-radius: 8px; flex: 1 1 400px; min-width: 300px; box-shadow: 0 0 8px rgba(0,0,0,0.1); }
form input, form textarea, form select { width: 100%; padding: 8px; margin-top:5px; margin-bottom:15px; border-radius:4px; border:1px solid #ccc; font-size:14px;}
#preview { background: #fff; padding:20px; border-radius:8px; box-shadow:0 0 8px rgba(0,0,0,0.1); white-space:pre-wrap; flex:1 1 400px; min-width:300px;}
h2{ text-align:center; width:100%; }
</style>
</head>
<body>

<h2>Salary Increment Letter Generator (Live Preview)</h2>

<div class="container">
    <form id="salaryForm">
        <label>Your Full Name:</label>
        <input type="text" id="name" placeholder="[Your Full Name]">

        <label>Your Designation / Post:</label>
        <input type="text" id="designation" placeholder="[Your Post/Designation]">

        <label>Employee ID (if any):</label>
        <input type="text" id="emp_id" placeholder="[Employee ID]">

        <label>Company / Organization / Office Name:</label>
        <input type="text" id="company" placeholder="[Company/Organization Name]">

        <label>Office Address:</label>
        <input type="text" id="address" placeholder="[Address]">

        <label>Calendar Type:</label>
        <select id="calendar" onchange="toggleDate()">
            <option value="AD">AD</option>
            <option value="BS">BS</option>
        </select>

        <div id="ad_date">
            <label>Date (AD):</label>
            <input type="date" id="date_ad">
        </div>

        <div id="bs_date" style="display:none;">
            <label>Date (BS):</label>
            <input type="text" id="date_bs" placeholder="YYYY-MM-DD">
        </div>
    </form>

    <div id="preview">
To,
The Manager / Head of Department,
[Company/Organization Name],
[Address].

Date: [YYYY-MM-DD] (AD)

Subject: Application for Salary Increment

Respected Sir/Madam,

I hope this letter finds you well. I would like to express my gratitude for the opportunity to serve in this organization. During my time here, I have sincerely carried out my duties and responsibilities with full dedication and honesty.

Considering my performance, responsibilities, and the increasing cost of living, I would like to kindly request a review of my current salary. I believe that a reasonable increment will further motivate me to continue performing at my best and contribute positively to the goals of the organization.

I shall remain committed to maintaining the same level of discipline and dedication in the future as well.

Thank you for your time and kind consideration.

Yours faithfully,
[Your Full Name]
[Your Post/Designation]
Employee ID: [Employee ID]
    </div>
</div>

<script>
const fields = ['name','designation','emp_id','company','address'];
const inputs = {};
fields.forEach(f => inputs[f] = document.getElementById(f));
const calendarSelect = document.getElementById('calendar');
const dateAD = document.getElementById('date_ad');
const dateBS = document.getElementById('date_bs');
const adDiv = document.getElementById('ad_date');
const bsDiv = document.getElementById('bs_date');
const previewDiv = document.getElementById('preview');

function toggleDate(){
    const type = calendarSelect.value;
    adDiv.style.display = type === 'AD' ? 'block' : 'none';
    bsDiv.style.display = type === 'BS' ? 'block' : 'none';
    updatePreview();
}

function updatePreview(){
    const name = inputs['name'].value || "[Your Full Name]";
    const designation = inputs['designation'].value || "[Your Post/Designation]";
    const emp_id = inputs['emp_id'].value || "[Employee ID]";
    const company = inputs['company'].value || "[Company/Organization Name]";
    const address = inputs['address'].value || "[Address]";
    const calendar = calendarSelect.value;
    const date = calendar === 'AD' ? (dateAD.value || new Date().toISOString().split('T')[0])
                                   : (dateBS.value || "[BS Date]");

    previewDiv.innerText = `To,
The Manager / Head of Department,
${company},
${address}.

Date: ${date} (${calendar})

Subject: Application for Salary Increment

Respected Sir/Madam,

I hope this letter finds you well. I would like to express my gratitude for the opportunity to serve in this organization. During my time here, I have sincerely carried out my duties and responsibilities with full dedication and honesty.

Considering my performance, responsibilities, and the increasing cost of living, I would like to kindly request a review of my current salary. I believe that a reasonable increment will further motivate me to continue performing at my best and contribute positively to the goals of the organization.

I shall remain committed to maintaining the same level of discipline and dedication in the future as well.

Thank you for your time and kind consideration.

Yours faithfully,
${name}
${designation}
Employee ID: ${emp_id}`;
}

// Attach input/change events
[...fields.map(f=>inputs[f]), calendarSelect, dateAD, dateBS].forEach(el=>{
    el.addEventListener('input', updatePreview);
    el.addEventListener('change', updatePreview);
});

// Initialize preview
updatePreview();
</script>

</body>
</html>
