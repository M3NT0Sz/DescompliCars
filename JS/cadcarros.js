function esconderMod(){
    const cadmod = document.querySelector("#cadmod");
    const modelo = document.querySelector("#modelo");
    const marca = document.querySelector("#marca");
    modelo.addEventListener("change", esconderAnoMod);    
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
    const cadanomod = document.querySelector("#cadAnoMod")
    const modelo = document.querySelector("#modelo")
    const valorSelecionado = modelo.value;

    if(valorSelecionado === ""){
        cadanomod.style.display = 'none';
    } else if(valorSelecionado != ""){
        cadanomod.style.display = '';
    }
}

function esconderAnoFab(){
    const cadanofab = document.querySelector("#cadAnoFab")
    const anomod = document.querySelector("#anomodelo")
    const valorSelecionado = anomod.value;

    if(valorSelecionado === ""){
        cadanofab.style.display = 'none';
    } else if(valorSelecionado != ""){
        cadanofab.style.display = '';
    }
}

function esconderVersao(){
    const cadversao =  document.querySelector("#cadVersao")
    const anofab = document.querySelector("#anofab")
    const valorSelecionado = anofab.value;

    if(valorSelecionado === ""){
        cadversao.style.display = 'none';
    } else if(valorSelecionado != ""){
        cadversao.style.display = '';
    }
}