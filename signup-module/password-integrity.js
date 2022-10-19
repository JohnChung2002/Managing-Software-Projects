async function hash(string) {
    const utf8 = new TextEncoder().encode(string);
    const hashBuffer = await crypto.subtle.digest('SHA-256', utf8);
    const hashArray = Array.from(new Uint8Array(hashBuffer));
    const hashHex = hashArray
      .map((bytes) => bytes.toString(16).padStart(2, '0'))
      .join('');
    return hashHex;
}

async function passwordHash(){
    console.log(document.getElementById("password").value);
    document.getElementById('hashValue').value = await hash(document.getElementById("password").value);
    document.getElementById("signupreset-form").submit();
}
