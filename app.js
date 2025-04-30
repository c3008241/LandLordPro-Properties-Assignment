
function changeToInt(){
  let input = document.querySelector(".changeToInt").value;
  //  this is a conversion from string to integer
  if(isNaN(input)) return 0; // isNAN means value is Not A Number (NaN)
  let value = parseInt(input);
}


function showSendMoney() {
  const sendMoney = document.querySelector('.sendMoney');
  const accountBalance = document.querySelector('.accountBalance');
  if (sendMoney) {
      sendMoney.style.display = 'block'; 
      accountBalance.style.display = 'none'; 
  } else {
      console.error('Element with class "accountBalance" not found.');
  }
}


function showAccountDetails() {
  const accountDetails = document.querySelector('.accountDetails');
  const accountBalance = document.querySelector('.accountBalance');
  if (accountDetails) {
      accountDetails.style.display = 'block'; 
      accountBalance.style.display = 'none'; 
  } else {
      console.error('Element with class "accountDetails" not found.');
  }
}

//each time the user clicks on the back button return them back to the account balance page 
function backToAccount() {
  window.location.href = 'accountBalance.php';
}