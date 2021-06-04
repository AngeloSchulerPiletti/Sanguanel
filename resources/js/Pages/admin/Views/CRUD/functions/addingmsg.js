

export default {
    addMsg: function (messages, messagesToAdd=false) {
        var tam = Object.keys(messages).length;
        messagesToAdd.forEach(function (msg) {
            messages[tam + 1] = msg;
            tam++;
        });

        return messages;
    }
}