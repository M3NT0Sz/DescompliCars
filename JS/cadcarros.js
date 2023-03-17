function esconderMod(){
    const cadmod = document.querySelector("#cadmod")
    const marca = document.querySelector("#marca")
    const valorSelecionado = marca.value;

    if(valorSelecionado === "Escolha uma Marca"){
        cadmod.style.display = 'none';
    } else if(valorSelecionado === "Audi"){
        cadmod.style.display = '';
    }else if(valorSelecionado === "BMW"){
        cadmod.style.display = '';
    }else if(valorSelecionado === "CAOA"){
        cadmod.style.display = '';
    }else if(valorSelecionado === "Chevrolet"){
        cadmod.style.display = '';
    }else if(valorSelecionado === "Citroen"){
        cadmod.style.display = '';
    }
}

function esconderAnoMod(){
    const cadanomod = document.querySelector("#cadanomod")
    const modelo = document.querySelector("#modelo")
    const valorSelecionado = modelo.value;

    if(valorSelecionado === "Escolha um Modelo"){
        cadanomod.style.display = 'none';
    } else if(valorSelecionado === "2023"){
        cadanomod.style.display = '';
    }
}

function esconderAnoFab(){
    const cadanofab = document.querySelector("#cadanofab")
    const anomod = document.querySelector("#anomodelo")
    const valorSelecionado = anomod.value;

    if(valorSelecionado === 'escolhaano'){
        cadanofab.style.display = 'none';
    } else if(valorSelecionado === 'ano1'){
        cadanofab.style.display = '';
    }
}

function esconderVersao(){
    const cadversao =  document.querySelector("#cadversao")
    const anofab = document.querySelector("#anofab")
    const valorSelecionado = anofab.value;

    if(valorSelecionado === "Escolha um ano"){
        cadversao.style.display = 'none';
    } else if(valorSelecionado === "2023"){
        cadversao.style.display = '';
    }
}