using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Escola
{
    internal static class Program
    {
        /// <summary>
        /// Ponto de entrada principal para o aplicativo.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            // Efetuar autenticação
            Application.Run(new FormAutenticacao());
            // Se a autenticação for bem sucedida, abrir a janela principal
            Application.Run(new Form1());
        }
    }
}
