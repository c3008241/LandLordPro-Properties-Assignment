
function changeToInt(){
  let input = document.querySelector(".changeToInt").value;
  // conversion from string to integer
  if(isNaN(input)) return 0; // value is not a number
  let value = parseInt(input);
}




function showSendMoney() {
  const sendMoney = document.querySelector('.sendMoney');
  const accountBalance = document.querySelector('.accountBalance');
  if (sendMoney) {
      sendMoney.style.display = 'block'; 
      accountBalance.style.display = 'none'; 
  } else {
      console.error('Element with class "accountDetails" not found.');
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


function backToAccount(){

  const accountDetails = document.querySelector('.accountDetails');
  const sendMoney = document.querySelector('.sendMoney');
  const accountBalance = document.querySelector('.accountBalance');
  if (accountBalance) {
      accountDetails.style.display = 'none'; 
      sendMoney.style.display = 'none'; 
      accountBalance.style.display = 'block'; 
  } else {
      console.error('Element with class "accountDetails" not found.');
  }
  
}