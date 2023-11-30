function maskPhoneNumber(input) {
    let value = input.value;
    value = value.replace(/\D/g, ""); // Remove caracteres não numéricos
    value = value.replace(/^(\d{2})(\d{1,5})/, "($1) $2"); // (XX)
    value = value.replace(/(\d{5})(\d{1,4})$/, "$1-$2"); // XXXXX-XXXX
    input.value = value;
}

function maskCPF(input) {
    let value = input.value;
    value = value.replace(/\D/g, "");
    value = value.replace(/(\d{3})(\d)/, "$1.$2");
    value = value.replace(/(\d{3})(\d)/, "$1.$2");
    value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
    input.value = value;
}

function isValidCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf.length !== 11 || !!cpf.match(/(\d)\1{10}/)) return false;

    let sum = 0;
    for (let i = 0; i < 9; i++) sum += parseInt(cpf[i]) * (10 - i);
    let check = 11 - (sum % 11);
    if (check === 10 || check === 11) check = 0;
    if (check !== parseInt(cpf[9])) return false;

    sum = 0;
    for (let i = 0; i < 10; i++) sum += parseInt(cpf[i]) * (11 - i);
    check = 11 - (sum % 11);
    if (check === 10 || check === 11) check = 0;
    if (check !== parseInt(cpf[10])) return false;

    return true;
}