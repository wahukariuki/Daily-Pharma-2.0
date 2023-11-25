//Handling Login for different Users
const activePatientL = document.querySelector('.patient');
const activeDoctorL = document.querySelector('.doctor');
const activePharmacyL = document.querySelector('.pharmacy');
const activeCompanyL = document.querySelector('.company');
const activeAdminL = document.querySelector('.admin');
const patientACL = document.querySelector('.login_patient');
const doctorACL = document.querySelector('.login_doctor');
const pharmacyACL = document.querySelector('.login_pharmacy');
const companyACL = document.querySelector('.login_company');
const adminACL = document.querySelector('.login_admin');

activePatientL.addEventListener('click', ()=> {
    patientACL.classList.add('active');
    pharmacyACL.classList.remove('active');
    doctorACL.classList.remove('active');
    companyACL.classList.remove('active');
    adminACL.classList.remove('active');
})

activeDoctorL.addEventListener('click', ()=> {
  doctorACL.classList.add('active');
  patientACL.classList.remove('active');
  pharmacyACL.classList.remove('active');
  companyACL.classList.remove('active');
  adminACL.classList.remove('active');
})

activePharmacyL.addEventListener('click', ()=> {
  pharmacyACL.classList.add('active');
  patientACL.classList.remove('active');
  doctorACL.classList.remove('active');
  companyACL.classList.remove('active');
  adminACL.classList.remove('active');
})

activeCompanyL.addEventListener('click', ()=> {
  companyACL.classList.add('active');
  patientACL.classList.remove('active');
  pharmacyACL.classList.remove('active');
  doctorACL.classList.remove('active');
  adminACL.classList.remove('active');
})

activeAdminL.addEventListener('click', ()=> {
  adminACL.classList.add('active');
  patientACL.classList.remove('active');
  pharmacyACL.classList.remove('active');
  doctorACL.classList.remove('active');
  companyACL.classList.remove('active');
})

