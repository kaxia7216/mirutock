const topHeadTexts = document.querySelectorAll(".overlay-text p");

let delay = 0;

//トップページのテキストのディレイ表示
topHeadTexts.forEach((text, index) => {
    setTimeout(() => {
        text.classList.add("show");
    }, delay);
    delay += 2000; // 2秒ごとに次のテキストを表示
});
