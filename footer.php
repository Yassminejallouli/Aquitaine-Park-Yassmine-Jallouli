<!-- Footer -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Liens vers des polices et bibliothèques si nécessaire -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Footer Styles */
        .footer_footer {
            background-color: #052038;
            color: #fff;
            padding: 20px 0;
            font-family: Arial, sans-serif;
            margin-top: 50px;
        }

        .footer-container_footer {
            display: flex;
            justify-content: space-around;
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-section_footer {
            flex: 1;
            margin: 0 20px;
            text-align: center;
        }

        .footer-section_footer h4_footer {
            font-size: 18px;
            margin-bottom: 10px;
            border-bottom: 2px solid #fff;
            padding-bottom: 5px;
        }

        .footer-section_footer p_footer,
        .footer-section_footer a_footer {
            color: #052038;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .footer-section_footer a_footer:hover {
            text-decoration: underline;
        }

        .footer-section_footer ul_footer {
            list-style: none;
            padding: 0;
        }

        .footer-section_footer ul_footer li_footer {
            margin-bottom: 5px;
        }

        .footer-bottom_footer {
            text-align: center;
            padding: 10px;
            background-color: #003580;
            font-size: 14px;
        }

    </style>
</head>
<body>
    <footer class="footer_footer">
        <div class="footer-container_footer">
            <div class="footer-section_footer contact_footer">
                <h4 class="h4_footer">Contact</h4>
                <p class="p_footer">📞 05 57 65 95 95</p>
                <p class="p_footer">✉️ <a href="mailto:contact@aquitaine-park.com" class="a_footer">contact@aquitaine-park.com</a></p>
            </div>

            <div class="footer-section_footer links_footer">
                <h4 class="h4_footer">Liens Utiles</h4>
                <ul class="ul_footer">
                    <li class="li_footer"><a href="../index.php" class="a_footer">Accueil</a></li>
                    <li class="li_footer"><a href="../affiche_place.php" class="a_footer">Réserver</a></li>
                    <li class="li_footer"><a href="FAQ.html" class="a_footer">FAQ</a></li>
                </ul>
            </div>

            <div class="footer-section_footer social_footer">
                <h4 class="h4_footer">Suivez-nous</h4>
                <a href="#" target="_blank" class="a_footer">🌐 Facebook</a> |
                <a href="#" target="_blank" class="a_footer">📸 Instagram</a> |
                <a href="#" target="_blank" class="a_footer">🐦 Twitter</a>
            </div>
        </div>
        <div class="footer-bottom_footer">
            &copy; 2024 Aquitaine Park | Tous droits réservés.
        </div>
    </footer>

    </body>
    </html>
