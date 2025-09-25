using Dapper;
using MySql.Data.MySqlClient;
using Mysqlx;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Escola
{
    public partial class FormAutenticacao : Form
    {
        public FormAutenticacao()
        {
            InitializeComponent();
            // A janela deverá surgir no centro do ecrã
            this.StartPosition = FormStartPosition.CenterScreen;
        }

        private void FormAutenticacao_Load(object sender, EventArgs e)
        {
            this.SuspendLayout();
            this.AcceptButton = BotaoOk;
            this.CancelButton = BotaoCancelar;
            this.Text = "Autenticação";
            this.FormBorderStyle = FormBorderStyle.FixedDialog;
            this.MinimizeBox = false;
            this.MaximizeBox = false;
            LabelFeedback.Visible = false;
            Password.UseSystemPasswordChar = true;
            this.ResumeLayout(false);
        }

        private void BotaoCancelar_Click(object sender, EventArgs e)
        {
            System.Environment.Exit(0);
        }
        /// <summary>
        /// Efetuar a autenticação.
        /// </summary>
        private void BotaoOk_Click(object sender, EventArgs e)
        {
            LabelFeedback.Visible = true;
            LabelFeedback.ForeColor = Color.Red;
            // Verificar se o utilizador inseriu os dados de autenticação
            if (!String.IsNullOrWhiteSpace(Utilizador.Text) &&
            (!String.IsNullOrWhiteSpace(Password.Text)))
            {
                try
                {
                    // Tentar a autenticação com os dados fornecidos pelo utilizador
                    using (var connection = new MySqlConnection(LigacaoDB.GetConnectionString()))
                    {
                        // Testar se o utilizador existe e a password está correta e a conta estáativa
                    // Se estas condições forem satisfeitas, o valor da variável resultado será 1
                     int resultado = connection.ExecuteScalar<int>(
                    "SELECT 1 FROM utilizadores WHERE Ativo = 1 AND Username = @Username ANDPassword = SHA2(@Password, 256)",
                    new { Username = Utilizador.Text, Password = Password.Text });
                        if (resultado == 1)
                        {
                            // O utilizador foi autenticado com sucesso; fechar a form e passar ocontrolo para a form principal
                        this.Close();
                        }
                        else
                        {
                            // A autenticação falhou
                            LabelFeedback.Text = "Nome de utilizador ou password incorretos";
                        }
                    }
                }
                catch (MySqlException ex)
                {
                    MessageBox.Show("Ocorreu um erro de base de dados ao tentar efetuar a autenticação", "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
            }
            else
            {
                LabelFeedback.Text = "Insira os dados de autenticação";
            }
        }
    }
}
