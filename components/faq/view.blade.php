<section class="faq">
    <h2 class="sro">FAQ</h2>
    <div class="faq__items">
        @foreach ($items as $item)
            <div class="faq__item">
                <details class="faq__question">
                    <summary class="faq__question-text">{{ $item['question'] }}</summary>
                </details>
                <div class="faq__answer">
                    <p class="faq__answer-text">{{ $item['answer'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
