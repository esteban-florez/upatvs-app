const pnfCheck=document.querySelector('#isPnf');const pnfInput=document.querySelector('#pnfName');pnfCheck.addEventListener('input',()=>{if(pnfCheck.checked){pnfInput.removeAttribute('disabled')}else{pnfInput.setAttribute('disabled','disabled')}});