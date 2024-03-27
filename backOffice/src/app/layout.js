import { Inter } from "next/font/google";
import "./globals.css";

const inter = Inter({ subsets: ["latin"] });

export const metadata = {
  title: "Back office - TDL exposition",
  favicon: "./favicon.ico",

  // description: " ",
};

export default function RootLayout({ children }) {
  return (
    <html lang="fr">
      <head>
        <meta name="robots" content="noindex" />
      </head>
      <body className={inter.className}>{children}</body>
    </html>
  );
}
