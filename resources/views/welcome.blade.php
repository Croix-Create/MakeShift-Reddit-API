<style>

.title 
    {
    margin-left: 42px;
    align-items: center;
    font-size: 50px;
    position: relative;
    }

.title::after 
    {
    content: ""; /* Add pseudo-element to create the line */
    position: absolute;
    top: 100%; /* Position the line at the bottom of the top div */
    width: 80%; /* Set the width of the line to 80% */
    height: 2px; /* Set the height of the line (thickness) */
    background-color: black; /* Set the color of the line */
    }

.content 

    {
    font-size: 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
    padding: 50px;

    }

</style>

<x-layout>
    <html>
    <body>

        <div class="title">
            <h1 style="margin-left: 20px;">
                Trending on Reddit
            </h1>
        </div>

        <div class="content">
            <p>
                Challenge the reactions and behaviours that Challenge the reactions and behaviours that no longer serve you.<br>
                Overcome addiction, anxiety, fear, phobias, negative thought patterns, depression...<br> 
                And find happiness.
            </p>
            <p>
            Welcome to Cape Town Hypnosis Centre where we provide a non-invasive and personally empowering therapy<br>
            to help our clients overcome a wide range of emotional and physical problems and traumas.<br>
            </p>
        </div>
        <div style="margin-top: -50px;" class="content">
            <p>
            Your hypnosis practitioner will be your guide, leading you through your subconscious mind. Your usual conscious inhibitors will be set aside and you will be able to recall events and feelings of memories that help to explain why certain behaviours <br>
            and reactions occur in response to certain stimuli. Once the root cause has been identified, the subconscious can be reprogrammed to respond in a new and healthier way.<br>
            Think of hypnosis as a personal trainer for the mind, providing positivereinforcement, transforming the mind and improving overall performance,<br>
            using tools such as relaxation, narrative, visualization, age regression, role play and music and NLP.<br>
            </p>
        </div>

        
    </body>
    </html>
</x-layout>
