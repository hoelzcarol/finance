// função formata dinheiro

function formataDinheiro(valor) {

    // declaração
    valor = parseFloat(valor);
    var valor_formatado;
    var valores;

    // inicio formata dinheiro
    valor_formatado = valor.toFixed(2);
    valores = valor_formatado.split('.');

    if (valores[1].length < 2) {
        valores[1] += "0";
    };

    valor_formatado = valores[0] + "," + valores[1];

    return valor_formatado;

};


// função insere novo registro
function insereRegistro(elem) {
    var classValor = (elem.tipo == "C") ? 'valor-credito' : 'valor-debito';
    
    var tr = $('<tr>' +
            '<td>' + elem.data + '</td>' +
            '<td>' + elem.descricao + '</td>' +
            '<td>' + elem.categoria + '</td>' +
            '<td>' + elem.tipo + '</td>' +
            '<td class=' + classValor + '>' + 'R$ ' + formataDinheiro(elem.valor) + '</td>' +
            '</tr>');

    $('#rel-30dias tbody').append(tr);
};


